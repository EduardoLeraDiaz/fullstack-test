<?php

namespace api\controller;

use api\repository\ProfileRepository;
use Symfony\Component\Config\Definition\Exception\Exception;
use api\entity\Profile;

class ProfileController
{

    /**
     * @param int $id
     * @return null|array
     */
    public function get($id)
    {
        $repository = new ProfileRepository();
        $profile = $repository->get($id);
        if (is_null($profile)) {
            throw new Exception('Profile not found');
        }

        return $profile->toArray();
    }
}