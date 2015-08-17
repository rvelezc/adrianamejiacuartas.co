<?php

/**
 * Class to handle all mailing
 */
class TwitterHandler {
    private $twitter;
    private $settings;
    
    function __construct() {
       // require_once 'Config.php';
       include_once 'twitter/TwitterAPIExchange.php';
       $this->settings = array(
            'oauth_access_token' => TWITTER_OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => TWITTER_OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key' => TWITTER_CONSUMER_KEY,
            'consumer_secret' => TWITTER_CONSUMER_SECRET
        );
        $this->twitter = new TwitterAPIExchange($this->settings);
        //echo MAIL_SERVER;
    }   
        
    public function get_tweets_with_hash($hash, $user, $count = 5) {
        $i = 0;
        $twits = array();
        $hashtags = array("#".$hash, $user);
        $urls   = array('<a href="https://twitter.com/search/?q=%23' . $hash . '&f=realtime" target="_blank">#' . $hash . '</a>', '<a href="https://twitter.com/' . $user . '">@' . $user . '</a>');

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=from:'.$user.'#'.$hash.'&result_type=recent&count=' . $count;
        $requestMethod = 'GET';
        $data = $this->twitter->setGetfield($getfield)
                              ->buildOauth($url, $requestMethod)
                              ->performRequest();  
        $json_output = json_decode($data, true);
        
        foreach($json_output['statuses'] as $status){
            $tmp_str = $this->create_links($status['text']);
            $twits[$i]['text'] = str_replace($hashtags, $urls, $tmp_str);
            $tmp_date = date_create_from_format('D M d H:i:s O Y', $status['created_at']);
            $twits[$i]['date'] = date_format($tmp_date, 'M d');
            $i++;
        } 
        return $twits;
    }
    
    public function create_links($t) {
        $text = trim($t);
        while ($text != stripslashes($text)) { $text = stripslashes($text); }    
        $text = strip_tags($text,"<b><i><u>");
        
        //First clean
        $text = preg_replace("/(?<!http:\/\/)www\./","http://www.",$text);
        
        //Create http links
        $text = preg_replace( "/((http|ftp)+(s)?:\/\/[^<>\s]+)/i", "<a href=\"\\0\" target=\"_blank\">\\0</a>",$text); 
        
        //Create @ links
        $text = preg_replace( "/(\s)(\@)([^<>\s]+)/i", "\\1<a href=\"https://twitter.com/\\2\\3\" target=\"_blank\">\\0</a>",$text); 
        
        //Create # links
        $text = preg_replace( "/(\s)(\#)([^<>\s]+)/i", "\\1<a href=\"https://twitter.com/search/?q=%23\\3\" target=\"_blank\">\\0</a>",$text); 
        
        return $text;
    }
    

}
?>

