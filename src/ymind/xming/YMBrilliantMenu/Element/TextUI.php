<?php
namespace ymind\xming\YMBrilliantMenu\Element;
use ymind\xming\YMBrilliantMenu\Func\ID;
class textUI
{
  const INDEX_BACK = 0;
  protected static $id = ID::TEXT;
  protected $data = 
  [
    'type'=>'form',
    'title'=>'提示框',
    'content'=>"文本",
    'buttons'=>
    [
      ['text'=>'确定'],
    ]
  ];
  protected $last;
  public function __construct(string $content,string $last){
    $this->data['content'] = $content;
    $this->last = $last;
  }
  public function send($player){
    \ymind\xming\YMBrilliantMenu\UISender::send(self::$id,$this->data,$player);
  }
}
?>