<?php
namespace DTP;

use pocketmine\event\Listener as L;
use pocketmine\plugin\PluginBase as PB;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\Server;

class DTP extends PB implements L{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("DirtToPoop Enabled!");
    }

    public function onDisable(){
        $this->getLogger()->info("DirtToPoop Disabled!");
    }

    public function onHold(PlayerItemHeldEvent $event){
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        if($item->getId() === 3){
            $poop = Item::get(35,12,1);
            $poop->setCustomName(TF::RESET. TF::BOLD. TF::GOLD. "POOP" . TF::RESET);
            $player->getInventory()->setItemInHand($poop);
        }
    }
}
?>
