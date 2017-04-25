<?php

namespace Akeneo\Pim\Api;

use Akeneo\Pim\Client\ResourceClientInterface;
use Akeneo\Pim\Pagination\PageFactoryInterface;
use Akeneo\Pim\Routing\UriGeneratorInterface;

/**
 * API implementation to manage the categories.
 *
 * @author    Laurent Petard <laurent.petard@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class CategoryApi implements CategoryApiInterface
{
    const CATEGORIES_PATH = 'api/rest/v1/categories';

    /** @var ResourceClientInterface */
    protected $resourceClient;

    /** @var PageFactoryInterface */
    protected $pageFactory;

    /**
     * @param ResourceClientInterface $resourceClient
     * @param  PageFactoryInterface   $pageFactory
     */
    public function __construct(ResourceClientInterface $resourceClient, PageFactoryInterface $pageFactory)
    {
        $this->resourceClient = $resourceClient;
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories($limit = 10, $withCount = false, array $queryParameters = [])
    {
        $data = $this->resourceClient->getResources(static::CATEGORIES_PATH, [], $limit, $withCount, $queryParameters);

        return $this->pageFactory->createPage($data);
    }
}
