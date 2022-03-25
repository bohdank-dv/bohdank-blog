<?php

declare(strict_types=1);

function blogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name' => 'Business',
            'url' => 'business',
            'posts' => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name' => 'Health',
            'url' => 'health',
            'posts' => [3, 4, 5]
        ],
        3 => [
            'category_id' => 3,
            'name' => 'Entertainment',
            'url' => 'entertainment',
            'posts' => [2, 4, 6]
        ],
        4 => [
            'category_id' => 4,
            'name' => 'Travel',
            'url' => 'travel',
            'posts' => [1, 2, 4]
        ]
    ];
}

function blogGetPost(): array
{
    return [
        1 => [
            'post_id' => 1,
            'name' => 'Post 1',
            'url' => 'post-1',
            'author_name' => 'John Doe',
            'publication_date' => date('Y-m-d H:i:s'),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ],
        2 => [
            'post_id' => 2,
            'name' => 'Post 2',
            'url' => 'post-2',
            'author_name' => 'Jane Doe',
            'publication_date' => date('Y-m-d H:i:s', strtotime("-2 days")),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ],
        3 => [
            'post_id' => 3,
            'name' => 'Post 3',
            'url' => 'post-3',
            'author_name' => 'Jason Doe',
            'publication_date' => date('Y-m-d H:i:s', strtotime("-3 days")),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ],
        4 => [
            'post_id' => 4,
            'name' => 'Post 4',
            'url' => 'post-4',
            'author_name' => 'John Doe',
            'publication_date' => date('Y-m-d H:i:s', strtotime("-4 days")),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ],
        5 => [
            'post_id' => 5,
            'name' => 'Post 5',
            'url' => 'post-5',
            'author_name' => 'Jane Doe',
            'publication_date' => date('Y-m-d H:i:s', strtotime("-5 days")),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ],
        6 => [
            'post_id' => 6,
            'name' => 'Post 6',
            'url' => 'post-6',
            'author_name' => 'Jason Doe',
            'publication_date' => date('Y-m-d H:i:s', strtotime("-6 days")),
            'content' => <<<CONTENT
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi culpa, cupiditate eius eos impedit 
                libero maxime nihil perferendis porro similique. Ab accusamus ad alias animi architecto commodi 
                corporis cumque deserunt eius, eligendi harum ipsam ipsum molestias neque nesciunt omnis perspiciatis 
                quia quis reiciendis repellat sint tempora vel veritatis! Dolor, quasi.
                CONTENT
        ]
    ];
}

function blogGetCategoryPost(int $categoryId): array
{
    $categories = blogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = blogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Post with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

function blogGetCategoryByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

function blogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetPost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}

function blogGetNewPosts(int $amount = 3): ?array
{
    $posts = blogGetPost();

    usort($posts, function ($post1, $post2) {
        return $post2['publication_date'] <=> $post1['publication_date'];
    });

    return array_slice($posts, 0, $amount, true);
}