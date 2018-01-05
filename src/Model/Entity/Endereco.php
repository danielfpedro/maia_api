<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use PhpParser\Node\Stmt\If_;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property string $cep
 * @property string $bairro
 * @property string $rua
 * @property string $numero
 * @property string $complemento
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property int $cidade_id
 * @property int $cliente_id
 *
 * @property \App\Model\Entity\Cidade $cidade
 * @property \App\Model\Entity\Cliente $cliente
 */
class Endereco extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => false,
        'cep' => true,
        'bairro' => true,
        'rua' => true,
        'numero' => true,
        'complemento' => true,
        'cidade_id' => true,
    ];
    
    public function getEstadoId() 
    {
        if (!array_key_exists('cidade', $this->_properties)){
            throw new \Exception("Você de conter Cidade");
        }
        
        $this->_properties['estado_id'] = $this->_properties['cidade']['estado_id'];
    }
}
