<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Form\Type\Admin\Category;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @category CCDNForum
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNForumForumBundle
 *
 */
class CategoryUpdateFormType extends AbstractType
{
    /**
     *
     * @access protected
     * @var string $categoryClass
     */
    protected $categoryClass;

    /**
     *
     * @access protected
     * @var string $forumClass
     */
    protected $forumClass;

    /**
     *
     * @access public
     * @var string $categoryClass
     * @var string $forumClass
     */
    public function __construct($categoryClass, $forumClass)
    {
        $this->categoryClass = $categoryClass;
		$this->forumClass = $forumClass;
    }

    /**
     *
     * @access public
     * @param FormBuilderInterface $builder, array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('forum', 'entity',
                array(
					'property'           => 'name',
					'class'              => $this->forumClass,
					'required'           => false,
                    'label'              => 'form.label.forum',
                    'translation_domain' => 'CCDNForumForumBundle',
                )
            )
            ->add('name', 'text',
                array(
                    'label'              => 'form.label.forum.name',
                    'translation_domain' => 'CCDNForumForumBundle',
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  array $options
     * @return array
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'          => $this->categoryClass,
            'csrf_protection'     => true,
            'csrf_field_name'     => '_token',
            // a unique key to help generate the secret token
            'intention'           => 'forum_category_update_item',
            'validation_groups'   => array('forum_category_update'),
            'cascade_validation'  => true,
        );
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'Forum_CategoryUpdate';
    }
}
