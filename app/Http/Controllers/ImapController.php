<?php

namespace App\Http\Controllers;
use Webklex\IMAP\Facades\Client;

use Illuminate\Http\Request;
class ImapController extends Controller
{
    public function getEmail(){
       
        // $oClient = new Client([
        //     'host'          => 'somehost.com',
        //     'port'          => 993,
        //     'encryption'    => 'ssl',
        //     'validate_cert' => true,
        //     'username'      => 'username',
        //     'password'      => 'password',
        //     'protocol'      => 'imap'
        // ]);
        // //Connect to the IMAP Server
        // $oClient->connect();
        // //Get all Mailboxes
        // /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
        // $aFolder = $oClient->getFolders();
        // //Loop through every Mailbox
        // /** @var \Webklex\IMAP\Folder $oFolder */
        // // foreach($aFolder as $oFolder){
        // //     //Get all Messages of the current Mailbox $oFolder
        // //     /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
        // //     $aMessage = $oFolder->messages()->all()->get();
            
        // //     /** @var \Webklex\IMAP\Message $oMessage */
        // //     foreach($aMessage as $oMessage){
        // //         echo $oMessage->getSubject().'<br />';
        // //         echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
        // //         echo $oMessage->getHTMLBody(true);
        // //     }
            // // }
            $oClient = Client::account('default');
            
            $oClient->connect();
            $aFolder = $oClient->getFolders();
            // $oFolder = $oClient->getFolder('INBOX.read');
            // dd($aFolder);
            foreach($aFolder as $oFolder){
                //Get all Messages of the current Mailbox $oFolder
                /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
                $aMessage = $oFolder->messages()->all()->get();
                
                /** @var \Webklex\IMAP\Message $oMessage */
                foreach($aMessage as $oMessage){
                    echo $oMessage->getSubject().'<br />';
                    echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
                    echo $oMessage->getHTMLBody(true);
                }
            }
    
    
    }
}
