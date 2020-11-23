<?php


namespace SrsBsns\PayHost\types;


class SingleVaultRequest
{
    /**
     * @var CardVaultRequest
     */
    protected $cardVaultRequest;

    /**
     * @var LookupVaultRequest $lookupVaultRequest
     */
    protected $lookupVaultRequest;

    /**
     * @var DeleteVaultRequest $deleteVaultRequest
     */
    protected $deleteVaultRequest;

    /**
     * @return CardVaultRequest
     */
    public function getCardVaultRequest()
    {
        return $this->cardVaultRequest;
    }

    /**
     * @param CardVaultRequest $cardVaultRequest
     */
    public function setVaultRequest($cardVaultRequest)
    {
        $this->cardVaultRequest = $cardVaultRequest;
    }

    /**
     * @return DeleteVaultRequest
     */
    public function getDeleteVaultRequest()
    {
        return $this->deleteVaultRequest;
    }

    /**
     * @param DeleteVaultRequest $deleteVaultRequest
     */
    public function setDeleteVaultRequest($deleteVaultRequest)
    {
        $this->deleteVaultRequest = $deleteVaultRequest;
    }

    public function getArray()
    {
        $array = [];
        if($this->cardVaultRequest !== null)
        {
            $array['CardVaultRequest'] = $this->cardVaultRequest->getArray();
        }
        return $array;
    }

}