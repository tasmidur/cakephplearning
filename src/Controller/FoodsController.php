<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Foods Controller
 *
 * @property \App\Model\Table\FoodsTable $Foods
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
//       $this->viewBuilder()->setLayout("admin-master");
    }

    public function display(){
//        $this->viewBuilder()->setLayout("admin-master");
        $foods = $this->paginate($this->Foods);
        $this->set(compact('foods'));
    }

    /**
     * View method
     *
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//        $this->viewBuilder()->setLayout("admin-master");

        $food = $this->Foods->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('food'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
//        $this->viewBuilder()->setLayout("admin-master");
        $food = $this->Foods->newEmptyEntity();

        if ($this->request->is('post')) {

            $food = $this->Foods->patchEntity($food, $this->request->getData());

            if(!$food->getErrors()){
                $image = $this->request->getData('image_file');
                $name = time().$image->getClientFilename();

                $targetPath=WWW_ROOT."img".DS.'food'.DS.$name;

                if($name){
                    $image->moveTo($targetPath);
                    $food->food_image="food/".$name;
                }
            }

            if ($this->Foods->save($food)) {
                $this->Flash->success(__('The food has been saved.'));
                return $this->redirect(['action' => 'display']);
            }
            $this->Flash->error(__('The food could not be saved. Please, try again.'));
        }
        $this->set(compact('food'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
//        $this->viewBuilder()->setLayout("admin/admin-master");

        $food = $this->Foods->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $food = $this->Foods->patchEntity($food, $this->request->getData());

            if(!$food->getErrors()&&!$this->request->getData('image_file')){
                $oldImagepath=WWW_ROOT.'img'.DS.$food->food_image;
                $image = $this->request->getData('image_file');
                $name = time().$image->getClientFilename();
                $targetPath=WWW_ROOT."img".DS.'food'.DS.$name;

                if($name){
                    if(file_exists($oldImagepath)){
                        unlink($oldImagepath);
                    }
                    $image->moveTo($targetPath);
                    $food->food_image="food/".$name;
                }
            }else {
                $food->food_image=$food->food_image;
            }

            if ($this->Foods->save($food)) {

                $this->Flash->success(__('The food has been saved.'));

                return $this->redirect(['action' => 'display']);
            }
            $this->Flash->error(__('The food could not be saved. Please, try again.'));
        }
        $this->set(compact('food'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $food = $this->Foods->get($id);
        $imagepath=WWW_ROOT.'img'.DS.$food->food_image;

        if ($this->Foods->delete($food)) {
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
            $this->Flash->success(__('The food has been deleted.'));
        } else {
            $this->Flash->error(__('The food could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
