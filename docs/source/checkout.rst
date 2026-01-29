Checkout Class
==============

.. php:class:: Checkout

    Represents a Checkout

    .. php:method:: __construct(?Branch $branch = null)

        Creates a new branch Checkout

        :param ?Branch $branch: The branch to checkout description (default: the default - main - branch)
        :returns: A new instance of ``Checkout``
        :rtype: Checkout

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``Checkout`` with the comment
        :rtype: Checkout
