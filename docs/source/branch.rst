Branch Class
============

.. php:class:: Branch

    Represents a Branch in a Kanban diagram

    .. php:method:: __construct(string $name, ?int $order)

        Creates a new Branch

        :param string $name: The Branch name
        :param ?int $id: The Branch rendering order (default: render in the order defined)
        :returns: A new instance of ``Branch``
        :rtype: Branch

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``Branch`` with the comment
        :rtype: Branch
