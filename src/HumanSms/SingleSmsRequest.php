<?php

namespace HumanSms;

class SingleSmsRequest
{
    /**
     * Tipo de ação requisitada ao servidor. Deve ter o valor "send"
     * 
     * Obrigatório
     * 
     * @var string 
     */
    protected $dispatch;
    
    /**
     * Nome da conta (letras minúsculas)
     * 
     * Obrigatório
     * 
     * @var string 
     */
    protected $account;
    
    /**
     * Senha de acesso para integração, que deve ser fornecida no momento de criação da conta.
     * 
     * Obrigatório
     * 
     * @var string 
     */
    protected $code;
    
    /**
     * Corpo da mensagem. Junto com "from", deve ter no máximo 150 caracteres, exceto Nextel que o limite é de 140 caracteres.
     * 
     * Obrigatório
     * 
     * @var string
     */
    protected $msg;
    
    /**
     * Nome do remetente. Se vazio, utiliza o remetente padrão da conta.
     * 
     * Opcional
     * 
     * @var string
     */
    protected $from;
    
    /**
     * Código País + Código Área + Número Celular (Ex.:555184220483)
     * 
     * Obrigatório
     * 
     * @var string
     */
    protected $to;
    
    /**
     * Código que o usuário pode fornecer para evitar duplicação e para poder
     * consultar o status da mensagem. Caso não seja fornecido, não será possível
     * a verificação de status (máx. 20 caracteres).
     * 
     * Opcional
     * 
     * @var string
     */
    protected $id;
    
    /**
     * Data e hora em que o torpedo deve ser enviado à operadora.
     * Deve estar no formato "dd/mm/aaaa hh:mm:ss".
     * 
     * Opcional
     * 
     * @var string 
     */
    protected $schedule;
    
    /**
     * Retorno de status por callback, conforme descrito na respectiva seção.
     * Os valores possíveis são:
     * 0 - inativo (padrão);
     * 1 - envia somente o status final da mensagem;
     * 2 - envia os status intermediários e o status final da mensagem.
     * Atenção: O callback só funciona se o campo "id" for preenchido.
     * 
     * Opcional
     * 
     * @var string 
     */
    protected $callbackOption;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dispatch = 'send';
    }
    
    /**
     * Get POST Parameters
     * 
     * @return array
     */
    public function getPostParams() {
        $params = array();
        if (!empty($this->dispatch)) {
            $params['dispatch'] = $this->getDispatch();
        }
        if (!empty($this->account)) {
            $params['account'] = $this->getAccount();
        }
        if (!empty($this->code)) {
            $params['code'] = $this->getCode();
        }
        if (!empty($this->msg)) {
            $params['msg'] = $this->getMsg();
        }
        if (!empty($this->from)) {
            $params['from'] = $this->getFrom();
        }
        if (!empty($this->to)) {
            $params['to'] = $this->getTo();
        }
        if (!empty($this->id)) {
            $params['id'] = $this->getId();
        }
        if (!empty($this->schedule)) {
            $params['schedule'] = $this->getSchedule();
        }
        if (!empty($this->callbackOption)) {
            $params['callbackOption'] = $this->getCallbackOption();
        }
        
        return $params;
    }
    
    /**
     * Tipo de ação requisitada ao servidor. Deve ter o valor "send"
     * 
     * @return string
     */
    public function getDispatch()
    {
        return $this->dispatch;
    }

    /**
     * Tipo de ação requisitada ao servidor. Deve ter o valor "send"
     * 
     * Obrigatório
     * 
     * @param string $dispatch
     */
    public function setDispatch($dispatch)
    {
        $this->dispatch = $dispatch;
    }

    /**
     * Nome da conta (letras minúsculas)
     * 
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Nome da conta (letras minúsculas)
     * 
     * Obrigatório
     * 
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Senha de acesso para integração, que deve ser fornecida no momento de criação da conta.
     * 
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Senha de acesso para integração, que deve ser fornecida no momento de criação da conta.
     * 
     * Obrigatório
     * 
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Corpo da mensagem. Junto com "from", deve ter no máximo 150 caracteres, exceto Nextel que o limite é de 140 caracteres.
     * 
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Corpo da mensagem. Junto com "from", deve ter no máximo 150 caracteres, exceto Nextel que o limite é de 140 caracteres.
     * 
     * Obrigatório
     * 
     * @param string $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Nome do remetente. Se vazio, utiliza o remetente padrão da conta.
     * 
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Nome do remetente. Se vazio, utiliza o remetente padrão da conta.
     * 
     * Opcional
     * 
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * Código País + Código Área + Número Celular (Ex.:555184220483)
     * 
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Código País + Código Área + Número Celular (Ex.:555184220483)
     * 
     * Obrigatório
     * 
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * Código que o usuário pode fornecer para evitar duplicação e para poder
     * consultar o status da mensagem. Caso não seja fornecido, não será possível
     * a verificação de status (máx. 20 caracteres).
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Código que o usuário pode fornecer para evitar duplicação e para poder
     * consultar o status da mensagem. Caso não seja fornecido, não será possível
     * a verificação de status (máx. 20 caracteres).
     * 
     * Opcional
     * 
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Data e hora em que o torpedo deve ser enviado à operadora.
     * Deve estar no formato "dd/mm/aaaa hh:mm:ss".
     * 
     * @return string
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Data e hora em que o torpedo deve ser enviado à operadora.
     * Deve estar no formato "dd/mm/aaaa hh:mm:ss".
     * 
     * Opcional
     * 
     * @param string $schedule
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Retorno de status por callback, conforme descrito na respectiva seção.
     * Os valores possíveis são:
     * 0 - inativo (padrão);
     * 1 - envia somente o status final da mensagem;
     * 2 - envia os status intermediários e o status final da mensagem.
     * Atenção: O callback só funciona se o campo "id" for preenchido.
     * 
     * @return type
     */
    public function getCallbackOption()
    {
        return $this->callbackOption;
    }

    /**
     * Retorno de status por callback, conforme descrito na respectiva seção.
     * Os valores possíveis são:
     * 0 - inativo (padrão);
     * 1 - envia somente o status final da mensagem;
     * 2 - envia os status intermediários e o status final da mensagem.
     * Atenção: O callback só funciona se o campo "id" for preenchido.
     * 
     * Opcional
     * 
     * @param string $callbackOption
     */
    public function setCallbackOption($callbackOption)
    {
        $this->callbackOption = $callbackOption;
    }

}
