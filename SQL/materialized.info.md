# [Material Views](https://www.materialized.info/)


## Intro

A Materialized View (MV) replaces a SQL multi-table-view (or query) with a new table that holds all data permutations
MV's are used to improve performance, and are preferable to replication where problem is due to an inefficient query plan

Why views and complex queries can be slow:

    An efficient query execution plan may not be viable
    Joins/View criteria may not allow use of indexes
    Joins/Views may involve calculations or string concatenations which can't be indexed
    Using Joins/Views can force table-scans which have slow performance

Why deploy a MV?   Compared with a normal View, a properly designed/implemented MV can improve performance:

    2x faster per table involved in the view (due to less I/O)
    up to 10x faster for views that involve calculations
    up to 100x faster for complex joins that force table scans

When to deploy a MV?   An MV logically should be deployed prior to:

    replication for the purpose of improving performance (because it has a much smaller penalty)
    sharding (because it may require application code changes, plus requires separate hard disks to work properly)

What about SQL Server's Indexed Views?   they have severe restrictions, including:

    no views-of-views
    no outer joins
    no COUNT or SUM or MIN/MAX operator use
    no ORDER BY


## Example: Table and View CREATE's and INSERT's

```sql
CREATE TABLE tState (
   StateID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   StateName CHAR(255) NOT NULL
);
INSERT INTO tState (StateName) VALUES
   ('California'),
   ('Washington');

CREATE TABLE tCity (
   CityID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   CityName CHAR(255) NOT NULL,
   StateIDFK INT NOT NULL
);
INSERT INTO tCity (CityName, StateIDFK) VALUES
   ('Los Angeles', 1),
   ('San Francisco', 1),
   ('Seattle', 2);


CREATE VIEW vStateCity AS
   SELECT StateID, StateName, CityID, CityName
      FROM tState s, tCity c
      WHERE c.StateIDFK = s.StateID;

```


## Example: View SELECT

```sql
SELECT * FROM vStateCity;
```

StateName 	CityName
California 	Los Angeles
California 	San Francisco
Washington 	Seattle


## Example: MV Create:

```sql
/* Create the MV table */
CREATE TABLE mvStateCity AS SELECT * FROM vStateCity;

/* Optionally add index(es) for the queries you want to speed up */
CREATE INDEX iStateCity ON mvStateCity(StateName, CityName)

/* Rename the old view to save it and to avoid application re-coding */
/* (For MS-SQL, use syntax 'EXEC sp_rename [old], [new]') */
RENAME TABLE vStateCity TO vStateCityOld;

/* Create the view that points to the MV */
CREATE VIEW vStateCity AS
   SELECT * FROM mvStateCity;
```

## Example: MV Query Run Time

```sql
SELECT * FROM vStateCity WHERE STATE= ‘California’ AND CityName LIKE ‘%an%’;
```

-----> runs 10x faster than original VStateCity query for large amounts of data


## Example: The MV Triggers (so MV self-maintains)

```sql
Example: The MV Triggers (so MV self-maintains)

(For MS-SQL, omit 'DELIMITER', omit '|', and use syntax 'CREATE TRIGGER [trig] ON [table] AS BEGIN ...')

DELIMITER |

CREATE TRIGGER trig_mviCity AFTER INSERT ON tCity
   FOR EACH ROW BEGIN
      INSERT INTO mvStateCity
         SELECT s.StateID, s.StateName, NEW.CityID, NEW.CityName
         FROM tState s WHERE s.StateID=NEW.StateIDFK;
   END;
|

CREATE TRIGGER trig_mvdCity AFTER DELETE ON tCity
   FOR EACH ROW BEGIN
      DELETE FROM mvStateCity
      WHERE CityID=OLD.CityID;
   END;
|
CREATE TRIGGER trig_mvuCity AFTER UPDATE ON tCity
   FOR EACH ROW BEGIN
      UPDATE mvStateCity SET CityName=NEW.CityName, StateID=NEW.StateIDFK
      WHERE CityID=NEW.CityID;
   END;
|

CREATE TRIGGER trig_mvdState AFTER DELETE ON tState
   FOR EACH ROW BEGIN
      DELETE FROM mvStateCity
      WHERE StateID=OLD.StateID;
   END;
|

DELIMITER ;
```

## What’s missing in our MV-create and MV-triggers?

    Generalization (must hand-code and test MV-create and triggers)
    View index (MV primary key) must be unique, which may/may-not be the case
    No error logging within the triggers
    Multiple MV copies possibly on different servers (which can achieve much higher performance)
    Automatic query-dispatching to multiple MV copies
    Automatic sharding


To comment or ask questions, click here.

For information about a fully automated MV-generator that solves all of the above issues, contact cliffjanson@gmail.com, Java/DB programmer


