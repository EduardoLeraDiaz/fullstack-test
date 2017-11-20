<?php
namespace api\repository;

use api\entity\Profile;

class ProfileRepository {
    public function get($id) {
        return ($id === '1') ? $this->fakeProfile() : null;
    }

    private function fakeProfile() {
        return new Profile('1', 'Sophie', '22', 'New York', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ligula ex, mattis rutrum luctus ut, dapibus eget augue. Sed id lectus sit amet erat consectetur elementum. ');
    }
}