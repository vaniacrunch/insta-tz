<?php

namespace App\Api\Instagram;

use App\Api\Instagram\Models\InstagramUserProfile;
use App\Helpers\InstagramUrlHelper;
use Illuminate\Support\Facades\Http;

class InstagramUserRequest
{
    /**
     * @var InstagramUrlHelper
     */
    private $instagramUrlHelper;

    public function __construct(InstagramUrlHelper $instagramUrlHelper)
    {

        $this->instagramUrlHelper = $instagramUrlHelper;
    }

    /**
     * @param $url
     * @return InstagramUserProfile|null
     */
    public function getInstagramUserProfile($url)
    {
        $url = $this->instagramUrlHelper::prepareUrl($url);

        $response = Http::withHeaders([
            'cookie' => 'mid=YSXxDQAEAAF5r-awl7unhtRdQSKA; ig_did=E988EDB7-256C-4CAE-87FD-D2A83C292A44; ig_nrcb=1; fbm_124024574287414=base_domain=.instagram.com; csrftoken=UE7UazvJN6NtnrEPuki2e5rbwWtWAsbV; ds_user_id=45626732057; sessionid=45626732057%3AVW9QmR2aQ0tb1u%3A7; shbid="14614\05445626732057\0541661412715:01f78f3904bb4b376bd9a5918074d0773a3729c7865000074a8dbe6afed3a475d86bf05f"; shbts="1629876715\05445626732057\0541661412715:01f7d70b33a2ca92eeb46cbc2e5c4fa4015f1e4ae4a357eb3f96470c4e984b0a8eea2bf2"; fbsr_124024574287414=pqBTmQXzR-WFx1xe20SGfNhpWnzzD-Ga_5F_2SNBtN4.eyJ1c2VyX2lkIjoiMTAwMDA4MDM1ODExMjMyIiwiY29kZSI6IkFRQUF3eGdfeXZMWmxucXRtREg3bkNZZTctZVVTVHFhcTFYMmNTbTVER0dTeXlDT3U3YkFxbFhlWUUtd2RIS0Ffc3c3UGRla1VaalZxWkEwVXJfSnlFQU1pUGd2cGlTVUR0V05Iekd0a1ozY2V4d3JCWE5NTEtFRGNUWFNURlAydGVsaUhuMEFkdzZBbUZQMVNWdDlYWnZZalZyQlpyTlJaU25FMlZ5UkFaLWM3QW13Xy13cEtZLUdvb0piSXVNcERMQkxoR1RLZGJoalM1dU56SXVleUhpOVJZRTUwSHpHVUlmYS05eXJlWmNnM0wyR3g1UDN2SUJFZ0xpZWxOd3djTUQ2MDlmVzhqdDczTXZTZVNlUzBsZEQ4MzRscHFjaktvRmNFRUxxaXRQWmd2bXlFSGhZblRDcGdyamZwTzRYT0xFc2RFdTYyTFZsUTFXRDV1NU0zNDFHIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQVBUekt3cm1hQVBUNkVvMzIyNkpaQTZ6aUlidVVTWkNaQ3NMWVh0QTBXZ0ZKV3A4UHZNZTVES0RVdHZuZjNOSVRtenBvOXZGSjVRVjREbVpDZExCQ0hxOHNGSHlUZ1pDMEVGUGNaQWlQOWFaQkdTNFY0OUY0ZFIyNUpqcXNENWlkVFU1dVpDUHRVWkFsT2NSY3lNMnhkRkxFUjRWNFhFWkNLOXowOGhPOURxR1pBeGFMNm5QSnZQZjBjWkQiLCJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImlzc3VlZF9hdCI6MTYyOTg3NjcxMn0; fbsr_124024574287414=kvOs33cSmRJy5RXlf19zGYu5YApuVLrwx35936q8Tds.eyJ1c2VyX2lkIjoiMTAwMDA4MDM1ODExMjMyIiwiY29kZSI6IkFRQ19tSm9kSkVxWjZqaGZfdHdEbVJObDRHM05QcWpVVWZBZHVYNnlkOGx5NVhCc0hyZktnTDQza1c3ZVRIZk1wdUMwSUpMRXNOa3paamlwc3N4RzVORHoxU1NoakdCbXJMd2xnS3ZfRnNtLWJHLTM4WmpJejJwa3NzYWdwWGVrSmZ0eWRUOXd3YnNjajVIbnBnbHFNNFhkcWlPeGNjWFVWTDlYMWdjc0NocV9IaFhPNm04V0VYMzJGV29KMGprVjZwUGM4eVZDU3l0MHU1VlZrbTNHWW90Z0o3eWphRUFYVGZDeHBFTjVZYW1vZTdKUmlZSmxid1pPT01ISmdFTDlFOXViVXZVZl9yeHNuWDVfb0NTQmFVNkw0dlA1Wk93ODIzemJXbjg3N3ZrelZ2Wmp4SlFxQXU3ZnRJaWdTSjA5VDhmVTh6RVZRVmF6Z2hzZzBkaWloTjcyIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQUtEQXFTNUcwbkJzYzJzMExRaHp4cVRPQkxYYjZEcDc4Z1VkSllaQkZDd1laQ0tkM2lWcWx5ekZuWkFaQjJkWXkzVW8wY2JaQndKUmlFaVdIcExtcDVoME9nNjZ6RzBPWkFnNURRQnNPOVZ5c1V5Szl3aTJ1RzRVS3Y3a1dsTGZLbTFJWkFieEpCdTBTNDJjSkd5QzA2UmV1SmpYR09pN1BLbnVDdzNyU0tTUTNGeFM3UEpHNlFaRCIsImFsZ29yaXRobSI6IkhNQUMtU0hBMjU2IiwiaXNzdWVkX2F0IjoxNjI5ODk2MzQ0fQ; rur="ASH\05445626732057\0541661435997:01f77e7304323f6a610e9f37cfb1ac3a16b9e73adcf6a3729d666f84d0a1fb4fe9db9cbc"'
        ])->get($url)->json();

        if(!$response){
            return null;
        }

        $user = new InstagramUserProfile([
            'id' => $response['graphql']['user']['id'],
            'username' => $response['graphql']['user']['username'],
            'picture' => 'data:image/jpg;base64,'.base64_encode(file_get_contents($response['graphql']['user']['profile_pic_url_hd'])),
            'followers' => $response['graphql']['user']['edge_followed_by']['count'],
            'followings' => $response['graphql']['user']['edge_follow']['count']
        ]);

//        $user = new InstagramUserProfile([
//            'id' => 123,
//        'username' => 'GS',
//        'picture' => 'data:image/jpg;base64,'.base64_encode(file_get_contents('https://scontent-iev1-1.cdninstagram.com/v/t51.2885-19/s320x320/155014268_435737357639692_1151699847568484257_n.jpg?_nc_ht=scontent-iev1-1.cdninstagram.com&_nc_ohc=gc8lLzxfhlUAX_tTCga&edm=ABfd0MgBAAAA&ccb=7-4&oh=c9f7f3532080b7bc5633950e056cb062&oe=612DA011&_nc_sid=7bff83')),
//        'followers' => 12,
//        'followings' => 23
//        ]);

        return $user;

    }
}
