Commit Class
============

.. php:class:: Commit

    Represents a Commit

    .. php:method:: __construct(string $id = '', string $tag = '', CommitType $type = CommitType::normal)

        Creates a new Commit of the active branch

        :param string $label: The Commit description
        :param ?string $id: The Commit id (default: auto-generated)
        :returns: A new instance of ``Commit``
        :rtype: Commit

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``Commit`` with the comment
        :rtype: Commit
