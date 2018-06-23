<?php
/**
 * @author Jonathan Greco <jonathan@superextralab.com>
 * date 23/06/2018
 */
declare(strict_types=1);

/**
 * Class MainController 6850 lines
 */
class MainController extends FrameworkController
{
    public function logUser()
    {
        /// ...code
    }

    public function configurePurchaseAddress(Request $request)
    {
        $id = $request->get('id');
        $post = $request->getPost();
        $customer = $this->getCustomer($id);
        
        if ($customer->isFlag2Address()) {
            $customer->setNameAdr2($post->get('name2'));
            // ...
        } else {
            $customer->setNameAdr2($customer->getNameAdr());
            //...
        }
    }

    public function getCustomer($id)
    {
       return $this->sqlConnection->execute("SELECT * FROM customer where id = :id")->setParameter(['id' => $id]);
    }

    /**
     *
     *
     * [Cut...]
     *
     */
}