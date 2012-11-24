<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrForum\Repository;

use Doctrine\Common\Collections\Criteria;
use ZfrForum\Entity\Category;
use ZfrForum\Mapper\CategoryMapperInterface;

class CategoryRepository extends EntityRepository implements CategoryMapperInterface
{
    /**
     * @param  Category $category
     * @return Category
     */
    public function create(Category $category)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param  Category $category
     * @return Category
     */
    public function update(Category $category)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param  Category $category
     * @return void
     */
    public function remove(Category $category)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param int $maxDepth
     * @return array
     */
    public function findAll($maxDepth = 3)
    {
        $exprBuilder = Criteria::expr();
        $criteria    = new Criteria($exprBuilder->lte('depth', $maxDepth));

        return $this->matching($criteria);
    }
}
