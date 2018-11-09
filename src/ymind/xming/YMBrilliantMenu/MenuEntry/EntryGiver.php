<?php
/* 用来在玩家出生(重生)时检测并给玩家ui物品 */
namespace ymind\xming\YMBrilliantMenu\MenuEntry;
class EntryGiver implements \pocketmine\event\Listener
{
  private static $entryitem;
  public static function isEntry(\pocketmine\item\Item $item):bool
  {
    return ($item->getID() == self::$entryitem->getId() && $item->getDamage() == self::$entryitem->getDamage());
  }
  public function __construct()
  {
    self::$entryitem=new \pocketmine\item\Item(381,20,"§a超§b级§c菜§e单§r");
    self::$entryitem->setCustomName(self::$entryitem->getVanillaName());
  }
  public function onPlayerRespawn(\pocketmine\event\player\PlayerRespawnEvent $event):void
  {
    $this->callPlayerAppear($event);
  }
  public function onPlayerJoin(\pocketmine\event\player\PlayerJoinEvent $event):void
  {
    $this->callPlayerAppear($event);
  }
  private function callPlayerAppear(\pocketmine\event\player\PlayerEvent $event):void
  {
    $player=$event->getPlayer();
    $cnt = 0;
    foreach($player->getInventory()->getContents() as $item)
    {
      if(self::isEntry($item))
      {
        $cnt += $item->getCount();
      }
    }
    if($cnt <= 0)
    {
      $player->getInventory()->addItem(clone self::$entryitem);
    }
  }
  /*
  public function onPlayerHeldItem(\pocketmine\event\player\PlayerItemHeldEvent $event)
  {
    if($event->getItem()->getId()=self::$entryitem->getId() && $event->getItem()->getDamage()=self::$entryitem->getDamage()){
      $event->getPlayer()->sendPopup(self::$entryitem->getName());
    }
  }
  */
}
?>