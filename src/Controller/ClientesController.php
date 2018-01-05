<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $clientes = $this->paginate($this->Clientes);
        $this->set(['items' => $clientes]);
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos', 'Telefones']
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);
        
        $errors = [];
               
        $cliente = $this->Clientes->newEntity($this->request->getData());
        $cliente->set('user_id', 1);
        
        // $this->jsonDd($cliente);
        
        if (!$this->Clientes->save($cliente)){
            $errors = $cliente->getErrors();
        }
        
        $this->set(compact('cliente', 'errors'));
        $this->set('_serialize', ['cliente', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $errors = [];
        
        $cliente = $this->Clientes->get($id, [
            'contain' => ['Enderecos.Cidades', 'Telefones']
        ]);
        
        $cliente->endereco->getEstadoId();
        
        
        if ($this->request->is(['patch', 'put'])) {
            
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            
            if (!$this->Clientes->save($cliente)) {
                $errors = $cliente->getErrors();
            }
            
            $this->set(compact(['cliente', 'errors']));
            $this->set('_serialize', ['cliente', 'errors']);
        } else {
            $this->set(compact('cliente'));
            $this->set('_serialize', 'cliente');
        }
       
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
