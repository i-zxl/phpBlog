<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
/*
*创建Article类实现文章的读取
*
*/
class Article extends CI_Model
{
    /*
    *包括文章发布和文章列表页

    *文章的获取

    *文章修改

    *文章删除
    */

    //将文章表设置为私有变量
    private $articletable = 'entries';
    // 留言板表格
    private $messagetable = 'comments';

    public function __construct(){

        parent::__construct();
        
        //加载文章数据库

        $this->load->database();

    }
    // 获取文章列表 参数为文章id
    public function GetList($slug=FALSE)
    {
        //判断文章的id是否存在
        if ($slug===FALSE) {

            $query = $this->db->get($this->articletable);

            return $query->result_array();

        }else{

            $slug = intval($slug);

            $sql = "SELECT * FROM ". $this->articletable. " WHERE id=".$slug;

            $query = $this->db->query($sql);

            // var_dump($query->result_array());
            
            // // 获取当前文章下的所有评论
            $one_message_query = "SELECT * FROM $this->messagetable WHERE Entries_id = $slug AND C_name_id = 0"; 
            $message_result = $this->db->query($one_message_query);

            $message_query_result = $message_result->result_array();

            // var_dump($message_query_result);

            if (empty($message_query_result) == FALSE) {
                    // 如果有评论则获取每条评论下是否含有针对本条评论的回复
                foreach ($message_query_result as $key => $value) {
                        $cid = $value['C_id'];
                        $centries = $value['Entries_id'];
                        $reply_query = "SELECT * FROM $this->messagetable WHERE C_name_id = $cid AND Entries_id = $centries";

                        $reply_result = $this ->db ->query($reply_query);

                        $reply_query_result = $reply_result->result_array();
                        // if ($reply_query_result) {
                            $message_query_result[$key]['mess'] = $reply_query_result;
                        // }

                }
            }
            // $result['0'] = $query->result_array();
            // $result[]
            $result = array('0' =>$query->result_array(),'1' => $message_query_result);
            return $result;
        }
    }
    // 获取关键词的文章，参数为查询分类
    public function Getallarticle($keyword)
    {
        $sql = "SELECT * FROM $this->articletable WHERE keyword = ? ORDER BY id DESC";

        $query = $this->db->query($sql,array($keyword));

        return $query->result_array();
    }

    //得到相应页面的条数 $arr数组三个参数 第一个是查询条件，第二个为查询条数，第三个为偏移量
    public function get_limit_articles($arr= array('keyword'=>FALSE,'num'=>FALSE,'offset'=>FALSE))
    {

        if (isset($arr['keyword']) && isset($arr['num']) && isset($arr['offset']) && $arr['keyword']!==FALSE && $arr['num']!==FALSE && $arr['offset']!==FALSE) {

            $count = count($this->Getallarticle($arr['keyword']));
           
            if ($count<=1) {

                $result = $this->Getallarticle($arr['keyword']);

            }else{
                // 查询分页的文章
                $sql = "SELECT * FROM $this->articletable WHERE keyword = ? ORDER BY id DESC LIMIT ".$arr['offset'].",".$arr['num'];
                $query = $this->db->query($sql,array($arr['keyword']));

                $result = $query->result_array();

                /*---start 统计文章阅读量 ---*/
                $result[0]['pageview'] = $result[0]['pageview']+1;
                // 得到对应文章下的编号
                $id = $result[0]['id'];
                // 获取当前阅读量
                $newpage = $result[0]['pageview'];
                // 调用当前路由时更新阅读量
                $set_sql = "update $this->articletable set pageview = '$newpage' WHERE id = $id";

                $this->db->query($set_sql);
                /*--- end ---*/

                /*--- 获取对应文章下的留言 --- */

                // 获取当前文章下的所有评论
                $message_query = "SELECT * FROM $this->messagetable WHERE Entries_id = $id AND C_name_id=0";                 
                $message_result = $this->db->query($message_query);

                $message_query_result = $message_result->result_array();
                // 判断是否有评论
                if (empty($message_query_result) == FALSE) {
                    // 如果有评论则获取每条评论下是否含有针对本条评论的回复
                    foreach ($message_query_result as $key => $value) {
                        // var_dump($value);
                        $cid = $value['C_id'];
                        $centries = $value['Entries_id'];
                        $reply_query = "SELECT * FROM $this->messagetable WHERE C_name_id = $cid AND Entries_id = $centries";

                        $reply_result = $this ->db ->query($reply_query);

                        $reply_query_result = $reply_result->result_array();
                            
                        // $result[0]['mess'] = $reply_query_result;

                        $message_query_result[$key]['mess'] = $reply_query_result;
                    }
                }
            }
            $returnresult = array('0' => $result,'1'=>$message_query_result);

            return $returnresult;
        }else{
            echo "not find";
        }
    }

}
 ?>
