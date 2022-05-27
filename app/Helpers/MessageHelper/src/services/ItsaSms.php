<?php


namespace App\Helpers\MessageHelper\src\services;


use App\Helpers\MessageHelper\src\IMessenger;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ItsaSms implements IMessenger
{

    public function sendMessage($to, array $tokens, $message)
    {
        // TODO: Implement sendMessage() method.
    }

    /**
     * @return PromiseInterface|Response
     * @throws Exception
     */
    public function getInfo()
    {
        return $this->httpClient()->get('account/info.json');
    }

    /**
     * @return PendingRequest
     * @throws Exception
     */
    public function httpClient(): PendingRequest
    {
        $api = config('messenger.api');
        if (!$api || $api = '')
            throw new Exception("SMS api key not found.");
        return Http::baseUrl('https://api.kavenegar.com/v1/' . $api . '/');
    }

    /**
     * @param $to
     * @param $token
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function verify($to, $token)
    {
        return $this->sendPattern($to, compact('token'), config('settings.sms_verify_template'));
    }

    /**
     * @throws Exception
     */
    public function sendPattern($receptor, array $tokens, $template)
    {
        $url = "verify/lookup.json";

        $data = [];
        if (!Arr::isAssoc($tokens)) {
            $i = 0;
            foreach ($tokens as $token)
                $data["token" . $i ? $i : ""] = $token;
        } else
            $data = $tokens;

        $data = array_merge($data, compact('receptor', 'template'));
        return $this->httpClient()->post($url, $data);
    }

    /**
     * @param array $receptor
     * @param array $sender
     * @param string $message
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function groupSend(array $receptor, array $sender, string $message)
    {
        return $this->httpClient()->post("sms/sendarray.json", compact('receptor', 'sender', 'message'));
    }

    /**
     * @param $messageid
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getDeliveryStatus($messageid)
    {
        return $this->httpClient()->get("sms/status.json", compact('messageid'));
    }

    /**
     * @param Carbon $startdate
     * @param Carbon|null $enddate
     * @param string|null $sender
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getSent(Carbon $startdate, Carbon $enddate = null, string $sender = null)
    {
        $startdate = $startdate->unix();
        $enddate = $enddate->unix();
        return $this->httpClient()->get("sms/selectoutbox.json", compact('startdate', 'enddate', 'sender'));
    }


    /**
     * @param int|null $pagesize
     * @param string|null $sender
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getLatestSent(int $pagesize = null, string $sender = null)
    {
        return $this->httpClient()->get('sms/latestoutbox.json', compact('pagesize', 'sender'));
    }

    /**
     * @param array $messageids
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function cancelSend(array $messageids)
    {
        $messageid = implode(',', $messageids);
        return $this->httpClient()->post('sms/cancel.json', compact('messageid'));
    }


    /**
     * @param string $linenumber
     * @param bool $isread
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getReceived(string $linenumber, bool $isread = false)
    {
        $isread = (int)$isread;
        return $this->httpClient()->get('sms/receive.json', compact('linenumber', 'isread'));
    }
}
