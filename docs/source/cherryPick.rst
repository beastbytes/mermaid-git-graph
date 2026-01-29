CherryPick Class
================

.. php:class:: CherryPick

    Represents a CherryPick

    .. php:method:: __construct(Commit $commit)

        Creates CherryPick

        :param Commit $commit: The Commit to cherrypick
        :returns: A new instance of ``CherryPick``
        :rtype: CherryPick

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``CherryPick`` with the comment
        :rtype: CherryPick
