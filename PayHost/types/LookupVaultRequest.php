<?php


namespace SrsBsns\PayHost\types;


class LookupVaultRequest
{
    /**
     * @var string $vaultId
     */
    protected $vaultId;

    /**
     * @var Account $account
     */
    protected $account;

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