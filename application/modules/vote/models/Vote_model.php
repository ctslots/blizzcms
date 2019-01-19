<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    
    /**
     * @return mixed
     */
    
    public function getVotes()
    {
        return $this->db->get('fx_votes')->result();
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getVotePoints($id)
    {
        return $this->db->where('id', $id)->get('fx_votes')->row('points');
    }
    
    /**
     * @param $id
     * @param $userid
     * @return mixed
     */
    public function getVoteLog($id, $userid)
    {
        return $this->db->where('idaccount', $userid)->where('idvote', $id)->limit('1')->order_by('id', 'DESC')->get('fx_votes_logs');
    }
    
    /**
     * @param $id
     * @param $userid
     * @return mixed
     */
    public function getTimeLogExpired($id, $userid)
    {
        return $this->db->where('idaccount', $userid)->where('idvote', $id)->limit('1')->order_by('id', 'DESC')->get('fx_votes_logs')->row('expired_at');
    }
    
    /**
     * @param $id
     * @param $userid
     * @return mixed
     */
    public function getCredits($userid)
    {
        return $this->db->where('accountid', $userid)->limit('1')->get('fx_credits')->row('vp');
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getVoteUrl($id)
    {
        return $this->db->where('id', $id)->get('fx_votes')->row('url');
    }
    
    /**
     * @param &id
     * @return bool|string
     */
    
    public function voteNow($id)
    {
        $userid = $this->session->userdata('fx_sess_id');
        $mytime = $this->m_data->getTimestamp();
        $ppoints = $this->getVotePoints($id);

        $qqcheck = $this->getVoteLog($id, $userid);
        $credits = $this->getCredits($userid);
        
    	$url = $this->getVoteUrl($id);

        $fecha = new DateTime();
        $expired = $fecha->add(new DateInterval($this->config->item('voteTime')));
        
        $expired_at = $expired->getTimestamp();
        
    	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		    $url = "http://" . $url;
		}
        
       $comprobetime = $qqcheck->row('expired_at');
        if($this->m_data->getTimestamp() >= $comprobetime){
        $datalog = array(
            'idaccount' => $userid,
            'idvote' => $id,
            'lasttime' => $mytime,
            'expired_at' => $expired_at,
            'points' => $ppoints,
        );
        
        $qq = $this->db->where('accountid', $userid)->get('fx_credits');
         if(!$qq->num_rows()){
           $datas = array('accountid' => $userid, 'vp' => $ppoints, 'dp' => '0');
           $this->db->insert('fx_credits', $datas);
         } else {
            $vp2 = $this->db->where('accountid', $userid)->get('fx_credits')->row('vp');
            $vp = ($vp2+$ppoints);
             
            $data = array( 'vp' => $vp );
             
            $this->db->where('accountid', $userid)->update('fx_credits', $data); 
            $this->db->insert('fx_votes_logs', $datalog);
             
        }     
            
        echo '<script type="text/javascript">
					window.open( "'.$url.'" )
				</script>';
        redirect(base_url('vote'),'refresh');
        } else { 
            echo '<script type="text/javascript">';
            echo 'alert("According to our records you have already voted in this top. Contact with Support Ingame for Resolving this problem")';
            echo '</script>';
            redirect(base_url('vote'),'refresh');
        }
    }
    
}
