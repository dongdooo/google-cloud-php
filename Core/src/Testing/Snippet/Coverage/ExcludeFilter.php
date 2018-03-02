<?php
/**
 * Copyright 2018 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Core\Testing\Snippet\Coverage;

use FilterIterator;
use Iterator;

class ExcludeFilter extends FilterIterator
{
    private $excludeDirs;

    public function __construct(Iterator $iterator, array $excludeDirs)
    {
        parent::__construct($iterator);
        $this->excludeDirs = $excludeDirs;
    }

    public function accept() {
        // Accept the current item if we can recurse into it
        // or it is a value starting with "test"
        foreach ($this->excludeDirs as $excludeDir) {
            if (strpos($this->current(), $excludeDir) !== FALSE) {
                return false;
            }
        }
        return true;
    }
}