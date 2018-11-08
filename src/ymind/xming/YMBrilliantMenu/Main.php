<?php
namespace ymind\xming\YMBrilliantMenu;
class Main extends ListenerRegister
{
  public function onLoad():void
  {
    $this->getLogger()->info("is Loading...");
    $this->assignInstance();
  }
  public function onEnable():void
  {
    self::registerListeners();
    $this->getLogger()->notice("is Enabled! --by xMing");
  }
  public function onDisable():void
  {
    $this->getLogger()->warning("is Stopped!");
  }
}
?>