Merge Class
===========

.. php:class:: Merge

    Represents a Merge

    .. php:method:: __construct(Branch $branch)

        Creates a new Merge

        :param Branch $branch: The branch to merge.
        :returns: A new instance of ``Merge``
        :rtype: Merge

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``Merge`` with the comment
        :rtype: Merge
