<?php

class Application_Model_Offer extends Zend_Db_Table_Abstract
{
    protected $_name = 'offer';

    public function selectAll() {
        return $this->fetchAll()->toArray();
    }

    public function selectOne($offer_id) {
        return $this->find($offer_id)->toArray()[0];
    }

    public function selectByProduct($p_id){
        $result= $this ->fetchall("product_id=$p_id")->toarray()[0];
        if($result){
          return $result;
        }else {
          // return "no offer";
        }
    }

    public function addOffer($data,$product_id) {
        $offer = array (
            'discount' => (int)$data['discount'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'product_id' => $product_id
        );
        $row = $this->createRow($offer);
        return $row->save();
    }

    public function editOffer($offer_id, $data) {
        $offer = array (
            'discount' => (int)$data['discount'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date']
        );
        return $this->update($offer, "id= $offer_id");
    }

    public function deleteOffer($offer_id) {
        return $this->delete("id= $offer_id");
    }

}
