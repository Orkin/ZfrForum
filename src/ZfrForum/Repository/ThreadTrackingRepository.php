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

use Doctrine\ORM\EntityRepository;
use ZfrForum\Entity\Thread;
use ZfrForum\Entity\ThreadTracking;
use ZfrForum\Mapper\ThreadTrackingMapperInterface;
use ZfrForum\Entity\Category;
use ZfcUser\Entity\UserInterface;

class ThreadTrackingRepository extends EntityRepository implements ThreadTrackingMapperInterface
{
    /**
     * @param  ThreadTracking $threadTracking
     * @return ThreadTracking
     */
    public function add(ThreadTracking $threadTracking)
    {

    }

    /**
     * @param  ThreadTracking $threadTracking
     * @return ThreadTracking
     */
    public function update(ThreadTracking $threadTracking)
    {
        $this->getEntityManager()->flush($threadTracking);
        return $threadTracking;
    }

    /**
     * @param  ThreadTracking $threadTracking
     * @return void
     */
    public function remove(ThreadTracking $threadTracking)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param  Thread        $thread
     * @param  UserInterface $user
     * @return ThreadTracking
     */
    public function findByThreadAndUser(Thread $thread, UserInterface $user)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select('tt')
            ->from('ZfrForum\Entity\ThreadTracking', 'tt')
            ->where('tt.thread = :thread')
            ->andWhere('tt.category = :category')
            ->andWhere('tt.user = :user')
            ->setParameter('thread', $thread)
            ->setParameter('user', $user);

        $threadTracking = $queryBuilder->getQuery()->getOneOrNullResult();

        return $threadTracking;
    }

    /**
     * @param  Category      $category
     * @param  UserInterface $user
     * @return array
     */
    public function findByCategoryAndUser(Category $category, UserInterface $user)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select('tt')
            ->from('ZfrForum\Entity\ThreadTracking', 'tt')
            ->where('ct.category = :category')
            ->andWhere('ct.user = :user')
            ->setParameter('category', $category)
            ->setParameter('user', $user);

        $categoryTracking = $queryBuilder->getQuery()->getResult();

        return $categoryTracking;
    }


}
