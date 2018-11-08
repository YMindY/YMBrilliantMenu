<?php
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
abstract class ListenerRegister extends PluginBase
{
  protected static $instance;
  protected static $namelist = 
  [
    MenuEntry\EntryGiver::class,
  ];
  protected static $listeners = [];
  protected function assignInstance()
  {
    self::$instance=$this;
  }
  final protected static function register(Listener $listener):void
  {
    self::$instance->getServer()->getPluginManager()->registerEvents($listener,self::$instance);
  }
  final protected static function registerListeners():void
  {
    foreach(self::$namelist as $name)
    {
      self::register(self::$listeners[$name]=new $name());
    }
  }
  public static function getListener(string $name):Listener
  {
    return self::$listeners[$name];
  }
}
?>