<?php

namespace App\Notifications\Channels;

use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

class LineHelper
{
    public static function getNewsFlex(string $category, string $thumbnail, string $url, string $title, string $text, string $sub_text, string $cat_color = "#ff334b")
    {
        $cat_width = \strlen($category) * 8;

        $flex = [
            "type" => "flex",
            "altText" => $category,
            "contents" => [
                "type" => "bubble",
                "hero" => [
                    "type" => "image",
                    "url" => $thumbnail,
                    "size" => "full",
                    "aspectRatio" => "20:7", // "20:13"
                    "aspectMode" => "cover",
                    // "action" => [
                    //     "type" => "uri",
                    //     "uri" => $url
                    // ]
                ],
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "spacing" => "md",
                    "action" => [
                        "type" => "uri",
                        "uri" => "line://msg/text/?{$url}" // $url
                    ],
                    "contents" => [
                        [
                            "type" => "box",
                            "layout" => "vertical",
                            "contents" => [
                              [
                                "type" => "text",
                                "text" => $category,
                                "color" => "#ffffff",
                                "align" => "center",
                                "size" => "xs",
                                "offsetTop" => "3px"
                              ]
                            ],
                            "position" => "absolute",
                            "cornerRadius" => "20px",
                            "offsetTop" => "1px",
                            "backgroundColor" => $cat_color,
                            "offsetEnd" => "1px",
                            "height" => "25px",
                            "width" => $cat_width . "px"
                          ],
                                            [
                        "type" => "text",
                        "text" => $title,
                        "size" => "md",
                        "weight" => "bold"
                        ],
                        [
                        "type" => "text",
                        "text" => $sub_text,
                        "wrap" => true,
                        "color" => "#aaaaaa",
                        "size" => "xxs"
                        ],
                        // [
                        // "type" => "box",
                        // "layout" => "vertical",
                        // "spacing" => "sm",
                        // "contents" => [
                            // [
                            // "type" => "box",
                            // "layout" => "baseline",
                            // "contents" => [
                                // [
                                //   "type" => "icon",
                                //   "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/restaurant_regular_32.png"
                                // ],
                                [
                                "type" => "text",
                                "text" => $text,
                                "wrap" => true,
                                "size" => "xs",
                                // "weight" => "bold",
                                // "margin" => "sm",
                                // "flex" => 0
                                ],
                                // [
                                //   "type" => "text",
                                //   "text" => "400kcl",
                                //   "size" => "sm",
                                //   "align" => "end",
                                //   "color" => "#aaaaaa" 445c90  905c44
                                // ]
                            // ]
                            // ]
                        // ]
                        // ]
                    ]
                ],
                // "footer" => [
                //     "type" => "box",
                //     "layout" => "vertical",
                //     "contents" => [
                //         [
                //           "type" => "text",
                //           "text" => $url
                //         ],
                //         // [
                //         //     "type" => "button",
                //         //     "style" => "primary",
                //         //     "color" => "#445c90",
                //         //     "action" => [
                //         //         "type" => "uri",
                //         //         "label" => "View Post",
                //         //         "uri" => $this->message->get_permalink()
                //         //     ]
                //         // ]
                //     ]
                // ]
            ]
        ];

        if (!$thumbnail) {
            unset($flex['contents']['hero']);
        }
        // line://msg/text/?{text_message}
        $mmb = new MultiMessageBuilder();
        $mmb->add(new RawMessageBuilder($flex));
        $mmb->add(new TextMessageBuilder($url));

        return $mmb;
    }

    public static function getTemplateSample()
    {
        // Warning. Does NOT work with desktop client

        return <<<EOF
        {
                "type": "template",
                "altText": "This is a buttons template",
                "template": {
                    "type": "buttons",
                    "thumbnailImageUrl": "https://example.com/bot/images/image.jpg",
                    "imageAspectRatio": "rectangle",
                    "imageSize": "cover",
                    "imageBackgroundColor": "#FFFFFF",
                    "title": "Menu",
                    "text": "Please select",
                    "defaultAction": {
                        "type": "uri",
                        "label": "View detail",
                        "uri": "http://example.com/page/123"
                    },
                    "actions": [
                        {
                          "type": "postback",
                          "label": "Buy",
                          "data": "action=buy&itemid=123"
                        },
                        {
                          "type": "postback",
                          "label": "Add to cart",
                          "data": "action=add&itemid=123"
                        },
                        {
                          "type": "uri",
                          "label": "View detail",
                          "uri": "http://example.com/page/123"
                        }
                    ]
                }
              }
EOF;
    }

    public static function getFlexSample()
    {
        return <<<EOF
        {
            "type": "flex",
            "altText": "this is a flex message",
            "contents": {
            "type": "bubble",
            "hero": {
              "type": "image",
              "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_2_restaurant.png",
              "size": "full",
              "aspectRatio": "20:13",
              "aspectMode": "cover",
              "action": {
                "type": "uri",
                "uri": "https://linecorp.com"
              }
            },
            "body": {
              "type": "box",
              "layout": "vertical",
              "spacing": "md",
              "action": {
                "type": "uri",
                "uri": "https://linecorp.com"
              },
              "contents": [
                {
                  "type": "text",
                  "text": "Brown's Burger",
                  "size": "md",
                  "weight": "bold"
                },
                {
                  "type": "box",
                  "layout": "vertical",
                  "spacing": "sm",
                  "contents": [
                    {
                      "type": "box",
                      "layout": "baseline",
                      "contents": [
                        {
                          "type": "icon",
                          "url": "https://scdn.line-apps.com/n/channel_devcenter/img/fx/restaurant_regular_32.png"
                        },
                        {
                          "type": "text",
                          "text": "$10.5",
                          "weight": "bold",
                          "margin": "sm",
                          "flex": 0
                        },
                        {
                          "type": "text",
                          "text": "400kcl",
                          "size": "sm",
                          "align": "end",
                          "color": "#aaaaaa"
                        }
                      ]
                    }
                  ]
                },
                {
                  "type": "text",
                  "text": "Sauce, Onions, Pickles, Lettuce & Cheese",
                  "wrap": true,
                  "color": "#aaaaaa",
                  "size": "xxs"
                }
              ]
            },
            "footer": {
              "type": "box",
              "layout": "vertical",
              "contents": [
                {
                  "type": "spacer",
                  "size": "xs"
                },
                {
                  "type": "button",
                  "style": "primary",
                  "color": "#905c44",
                  "action": {
                    "type": "uri",
                    "label": "Add to Cart",
                    "uri": "https://linecorp.com"
                  }
                }
              ]
            }
          }
        }
EOF;
    }
}
