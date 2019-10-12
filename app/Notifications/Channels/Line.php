<?php
namespace App\Notifications\Channels;

use Exception;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

// use Illuminate\Support\Arr;
// use GuzzleHttp\Client as HttpClient;
// use GuzzleHttp\Exception\RequestException;
// use NotificationChannels\Line\Exceptions\CouldNotSendNotification;
class Line
{
    /**
     * Line API base URL.
     *
     * @var string
     */
    protected $baseUrl;
    /**
     * API HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;
    protected $bot;
    /**
     * Line API token.
     *
     * @var string
     */
    protected $token;
    /**
     * @param \GuzzleHttp\Client $http
     * @param string $token
     */
    public function __construct()
    {
        $token = config('services.line.token');
        $secret = config('services.line.secret');
        $httpClient = new CurlHTTPClient($token); // channel access token
        $this->bot = new LINEBot($httpClient, ['channelSecret' => $secret]); // <channel secret>
        $this->baseUrl = config('services.line.endpoint');
        // $this->httpClient = $http;
        // $this->token = $token;
    }
    /**
     * Send a message to a Line channel.
     *
     * @param string $channel
     * @param array $data
     *
     * @return array
     */
    public function send($channel, array $data)
    {
        $textMessageBuilder = new TextMessageBuilder($data['message']);
        // $response = $this->bot->replyMessage('<reply token>', $textMessageBuilder);
        $response = $this->bot->sendBroadcast($textMessageBuilder);
        if ($response->isSucceeded()) {
            echo 'Succeeded!';
            return;
        }

        // Failed
        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

        // return $this->request('POST', 'channels/'.$channel.'/messages', $data);
    }
    public function sendBroadcast(MessageBuilder $messageBuilder)
    {
        // $textMessageBuilder = new TextMessageBuilder($message);
        // $response = $this->bot->replyMessage('<reply token>', $textMessageBuilder);
        $response = $this->bot->broadcast($messageBuilder);
        if ($response->isSucceeded()) {
            echo 'Succeeded!';
            return;
        }

        // Failed
        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

        // return $this->request('POST', 'channels/'.$channel.'/messages', $data);
    }
    /**
     * Get a private channel with another Line user from their snowflake ID.
     *
     * @param string $userId
     *
     * @return string
     */
    // public function getPrivateChannel($userId)
    // {
    //     return $this->request('POST', 'users/@me/channels', ['recipient_id' => $userId])['id'];
    // }
    /**
     * Perform an HTTP request with the Line API.
     *
     * @param string $verb
     * @param string $endpoint
     * @param array $data
     *
     * @return array
     *
     * @throws \NotificationChannels\Line\Exceptions\CouldNotSendNotification
     */
    // protected function request($verb, $endpoint, array $data)
    // {
    //     $url = rtrim($this->baseUrl, '/').'/'.ltrim($endpoint, '/');
    //     try {
    //         $response = $this->httpClient->request($verb, $url, [
    //             'headers' => [
    //                 'Authorization' => 'Bot '.$this->token,
    //             ],
    //             'json' => $data,
    //         ]);
    //     } catch (RequestException $exception) {
    //         if ($response = $exception->getResponse()) {
    //             throw CouldNotSendNotification::serviceRespondedWithAnHttpError($response);
    //         }
    //         throw CouldNotSendNotification::serviceCommunicationError($exception);
    //     } catch (Exception $exception) {
    //         throw CouldNotSendNotification::serviceCommunicationError($exception);
    //     }
    //     $body = json_decode($response->getBody(), true);
    //     if (Arr::get($body, 'code', 0) > 0) {
    //         throw CouldNotSendNotification::serviceRespondedWithAnApiError($body);
    //     }
    //     return $body;
    // }
}
