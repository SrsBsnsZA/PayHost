<?php


namespace SrsBsns\PayHost\types;


class CardVaultRequest
{
    /**
     * @var Account
     */
    protected $Account;

    /**
     * @var string
     */
    protected $CardNumber;
    /**
     * @var string
     */
    protected $CardExpiryDate;

    /**
     * @return string
     */
    public function getCardExpiryDate()
    {
        return $this->CardExpiryDate;
    }

    /**
     * @param string $CardExpiryDate
     */
    public function setCardExpiryDate($CardExpiryDate)
    {
        $this->CardExpiryDate = $CardExpiryDate;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->CardNumber;
    }

    /**
     * @param string $CardNumber
     */
    public function setCardNumber($CardNumber)
    {
        $this->CardNumber = $CardNumber;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->Account;
    }

    /**
     * @param Account $Account
     */
    public function setAccount($Account)
    {
        $this->Account = $Account;
    }
    public function getArray()
    {
        return ['Account'=>$this->getAccount()->getArray(),'CardNumber'=>$this->getCardNumber(),'CardExpiryDate'=>$this->getCardExpiryDate()];
    }

}