<?php

namespace DidUngar\TelegramBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function indexAction()
    {
	$em = $this->getDoctrine()->getManager();
	$repLog = $em->getRepository('DidUngarTelegramBundle:Logs');
	$lstLog = $repLog->findBy([], ['id'=>'DESC'], 1000);
        return $this->render('DidUngarTelegramBundle:Admin:index.html.twig', [
		'lstLog' => $lstLog,
	]);
    }

    /**
     * @Route("/admin/chat")
     * @Route("/admin-{id_bot}/chat")
     */
    public function lstChatAction(int $id_bot = 0)
    {
        $em = $this->getDoctrine()->getManager();
                $oTgLogsService = $this->get('didungar_telegram_logs_service');
                $oTG = $this->get('didungar_telegram_bot_service');
                $oLogs = $oTgLogsService->select();
                $lstChat = [];
                foreach($oLogs as $oLog) {
                        if ( ! $oLog->getFromUsername() ) continue;
                        try {
                                if ( ! empty($lstChat[$oLog->getChatId()]) ) continue;
                                $lstChat[$oLog->getChatId()] = $oTG->getChat([
                                        'chat_id' => $oLog->getChatId(),
                                ]);
                        } catch (\Exception $e){
                                echo "ERROR : API TG (\$oLog->getChatId():".$oLog->getChatId().")\n";
                                echo $e->getMessage()."\n";
                        }
                }
        return $this->render('DidUngarTelegramBundle:Admin:lstChat.html.twig', [
                'lstChat' => $lstChat,
        ]);
    }
}
