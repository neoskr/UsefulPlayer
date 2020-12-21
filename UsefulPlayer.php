<?php

/**
 * @name UsefulPlayer
 * @main UsefulPlayer\UsefulPlayer
 * @author SYNK
 * @version Master - Beta 1
 * @api 3.0.0
 * @description !
 */
 

namespace UsefulPlayer;


use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerCreationEvent;

use pocketmine\Player;
use onebone\economyapi\EconomyAPI;



class UsefulPlayer extends PluginBase
{

    public function onEnable ()
    {

		$this->getServer()->getPluginManager()->registerEvents (new class implements Listener
		{

			public function onCreated (PlayerCreationEvent $event) : void
			{

				$event->setPlayerClass (PlayerClass::class);

			}
			
			/*
			public function onJoin (\pocketmine\event\player\PlayerJoinEvent $event) : void
			{
				
				$event->getPlayer()->sendMessage ('your money: ' . $event->getPlayer()->getMoney());

			}
			*/

		}, $this);

    }

}

class PlayerClass extends Player
{
	
	public function myMoney ()
	{
		
		return $this->getMoney();
		
	}

	public function getMoney ()
	{
		
		return EconomyAPI::getInstance()->myMoney ($this);
		
	}
	
	public function setMoney (float $money) : int
	{
		
		return EconomyAPI::getInstance()->setMoney ($this, $money);
		
	}
	
	public function addMoney (float $money) : int
	{
		
		return EconomyAPI::getInstance()->addMoney ($this, $money);
		
	}
	
	public function reduceMoney (float $money) : int
	{
		
		return EconomyAPI::getInstance()->reduceMoney ($this, $money);
		
	}
	
	public function getRank ()
	{
		
		return EconomyAPI::getInstance()->getRank ($this);
		
	}
	
	public function accountExists () : bool
	{
		
		return EconomyAPI::getInstance()->accountExists ($this);
		
	}

}
