<?php

class Bx24 {

    private $logs = array();
    private $config = array();

    /**
     * Bx24 constructor.
     * @param $id
     * @param $host
     * @param $token
     */
    public function __construct($id, $host, $token)
    {
        $this->config = array(
            'id' => $id,
            'host' => $host,
            'token' => $token
			);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createContact(Array $data = array())
    {
        $post = array(
            'fields' => $data,
            'params' => array('REGISTER_SONET_EVENT' => 'Y')
        );

        return $this->request('crm.contact.add', $post);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createDeal(Array $data = array())
    {
        $post = array(
            'fields' => $data,
            'params' => array('REGISTER_SONET_EVENT' => 'Y')
        );

        return $this->request('crm.deal.add', $post);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function getLeadList(Array $data = array())
    {
        $post = array(
            'fields' => $data,
            'params' => array('REGISTER_SONET_EVENT' => 'Y')
        );

        return $this->request('crm.lead.list', $post);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function getUsers(Array $data = array())
    {

        return $this->request('user.get', $data);
    }
    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function getDealList(Array $data = array())
    {

        return $this->request('crm.deal.list', $data);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createLead(Array $data = array())
    {
        $post = array(
            'fields' => $data,
            'params' => array('REGISTER_SONET_EVENT' => 'Y')
        );

        return $this->request('crm.lead.add', $post);
    }

    /**
     * @param $method
     * @param $post
     * @return mixed
     * @throws \Exception
     */
    public function request($method, $post)
    {
        $url = $this->getUrl($method);
        $curl = curl_init($url);
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FAILONERROR => 1,
            CURLOPT_DNS_USE_GLOBAL_CACHE => false,
            CURLOPT_DNS_CACHE_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => http_build_query($post, '', '&'),
        ));
        $response = curl_exec($curl);
        $info = curl_getinfo($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            $message = sprintf("[%s]: %s, %s, %s", date('Y-m-d H:i:s'), $info['http_code'], $url, $error);
            array_push($this->logs, $message);
            throw new \Exception($message);
        }

        return json_decode($response, true);
    }

    /**
     * @param $method
     * @return string
     */
    private function getUrl($method)
    {
        return sprintf('https://%s/rest/%s/%s/%s.json', $this->config['host'], $this->config['id'], $this->config['token'], $method);
    }

    /**
     * @return array
     */
    public function getLogs()
    {
        return $this->logs;
    }
}
