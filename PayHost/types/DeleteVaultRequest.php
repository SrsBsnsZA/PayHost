<?php


namespace SrsBsns\PayHost\types;


class DeleteVaultRequest
{
    /**
     * @var Account $account
     */
    protected $account;

    /**
     * @var string $vaultId
     */
    protected $vaultId;

    /**
     * @return string
     */
    public function getVaultId()
    {
        return $this->vaultId;
    }

    /**
     * @param string $vaultId
     */
    public function setVaultId($vaultId)
    {
        $this->vaultId = $vaultId;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }
}