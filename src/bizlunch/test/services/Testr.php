<?php

namespace bizlunch\test\services;


class Testr
{
    public function init()
    {
        $this->initMongoDB();
        $this->initElasticSearch();
    }

    protected function initMongoDB()
    {
        shell_exec('export DOCKER_HOST=tcp://192.168.59.103:2376');
        shell_exec('export DOCKER_CERT_PATH=/Users/tom/.boot2docker/certs/boot2docker-vm');
        shell_exec('export DOCKER_TLS_VERIFY=1');

        shell_exec('docker exec -ti api_mongo_1 mongo bizlunch --eval "db.dropDatabase()"');
    }

    protected function initElasticSearch()
    {
        shell_exec('curl -XDELETE ' . TEST_HOST . ':9200/items');

        shell_exec('curl -XPUT ' . TEST_HOST . ':9200/items --data-binary @/Users/tom/www/bizlunch/api/ressources/elasticsearch/index.json');
    }
}