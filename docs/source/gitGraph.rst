GitGraph Class
==============

.. php:class:: GitGraph

    Represents a GitGraph diagram

    .. php:method:: addItem(ItemInterface ...$item)

        Add item(s)

        :param ItemInterface ...$item: The item(s)
        :returns: A new instance of ``GitGraph`` with the item(s) added
        :rtype: GitGraph

    .. php:method:: render(array $attributes = [])

        Renders the diagram

        :param array $attributes: HTML attributes for the <pre> tag as name=>value pairs

            .. note:: The *mermaid* class is added

        :returns: Mermaid diagram code in a <pre> tag
        :rtype: string

    .. php:method:: withComment(string $comment)

        Add a comment

        :param string $comment: The comment
        :returns: A new instance of ``GitGraph`` with the comment
        :rtype: GitGraph

    .. php:method:: withItem(ItemInterface ...$item)

        Set items column(s)

        :param ItemInterface ...$item: The item(s)
        :returns: A new instance of ``GitGraph`` with the item(s)
        :rtype: GitGraph
