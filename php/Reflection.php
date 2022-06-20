<?

$reflection = new ReflectionClass($FUNCS);
$vars = $reflection->getProperties();
foreach($vars as $key => $value){
   $props[] = $value->getName().' = `'.$value->getValue($entity).'`';
}
$this->dump('Свойства объекта:');
$this->dump($props);
