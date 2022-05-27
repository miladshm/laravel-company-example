<?php


namespace App\Helpers\MessageHelper\src;


use Carbon\Carbon;
use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

interface IMessenger
{
    public function sendPattern($receptor, array $tokens, $template);

    public function sendMessage($to, array $tokens, $message);


    public function verify($to, $token);

    /**
     * @return mixed
     */
    public function getInfo();

    /**
     * @return PendingRequest
     * @throws Exception
     */
    public function httpClient(): PendingRequest;

    /**
     * @param array $receptor
     * @param array $sender
     * @param string $message
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function groupSend(array $receptor, array $sender, string $message);

    /**
     * @param $messageid
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getDeliveryStatus($messageid);

    /**
     * @param Carbon $startdate
     * @param Carbon|null $enddate
     * @param string|null $sender
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getSent(Carbon $startdate, Carbon $enddate = null, string $sender = null);


    /**
     * @param int|null $pagesize
     * @param string|null $sender
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getLatestSent(int $pagesize = null, string $sender = null);

    /**
     * @param array $messageids
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function cancelSend(array $messageids);

    /**
     * @param string $linenumber
     * @param bool $isread
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getReceived(string $linenumber, bool $isread = false);
}
