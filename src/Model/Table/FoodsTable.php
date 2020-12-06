<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validation;
use Cake\Validation\Validator;
use Psr\Http\Message\UploadedFileInterface;

/**
 * Foods Model
 *
 * @method \App\Model\Entity\Food newEmptyEntity()
 * @method \App\Model\Entity\Food newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Food[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Food get($primaryKey, $options = [])
 * @method \App\Model\Entity\Food findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Food patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Food[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Food|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FoodsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('foods');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->numeric('delivery_cost')
            ->requirePresence('delivery_cost', 'create')
            ->notEmptyString('delivery_cost');
        $validator
            ->allowEmptyFile('food_image')
            ->add('food_image',[
                "mimeType"=>[
                    'rule'=>[
                        'mimeType',['image/jpg','image/png','image/jpeg']
                    ],
                    "message"=>'Please Upload only jpg and png',
                ],
                "fileSize"=>[
                    'rule'=>['fileSize','<=','1MB'],
                    'message'=>"Image file size must be less than 1 MB",
                ]
            ]);
        return $validator;
    }
}
