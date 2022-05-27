<?php


namespace App\Helpers\MessageHelper\src\services;


use App\Helpers\MessageHelper\src\IMessenger;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ItsaPayam implements IMessenger
{

    public function sendMessage($to, array $tokens, $message)
    {
        // TODO: Implement sendMessage() method.
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        // TODO: Implement getInfo() method.
    }

    /**
     * @throws Exception
     */
    public function verify($to, $token)
    {
        return $this->sendPattern($to, compact('token'), config('messenger.verify_template'));
    }

    /**
     * @param $receptor
     * @param array $tokens as assoc array of token name and values
     * @param $template
     * @return PromiseInterface|Response
     * @throws Exception
     */
    public function sendPattern($receptor, array $tokens, $template)
    {
        $data = [
            "pid" => $template,
            "fnum" => config('messenger.from'),
            "tnum" => $receptor
        ];
        $i = 0;
        foreach ($tokens as $k => $v) {
            $data["p" . ++$i] = $k;
            $data["v" . ++$i] = $v;
        }
        return $this->httpClient()->get("", $data);
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
        return Http::baseUrl("https://ippanel.com:8080/?apikey=" . $api);
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
        // TODO: Implement groupSend() method.
    }

    /**
     * @param $messageid
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getDeliveryStatus($messageid)
    {
        // TODO: Implement getDeliveryStatus() method.
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
        // TODO: Implement getSent() method.
    }

    /**
     * @param int|null $pagesize
     * @param string|null $sender
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getLatestSent(int $pagesize = null, string $sender = null)
    {
        // TODO: Implement getLatestSent() method.
    }

    /**
     * @param array $messageids
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function cancelSend(array $messageids)
    {
        // TODO: Implement cancelSend() method.
    }

    /**
     * @param string $linenumber
     * @param bool $isread
     * @return Response|PromiseInterface
     * @throws Exception
     */
    public function getReceived(string $linenumber, bool $isread = false)
    {
        // TODO: Implement getReceived() method.
    }
}
