from linked_list import SinglyLinkedList

def merge_sort(linked_list):
    """
    Sorts a linked list in ascending order
    - Recursively divide the linked list into sublists containing a single node
    - Repeatedly merge the sublists to produce sorted sublists until one remains

    Returns a sorted linked list
    """

    if linked_list.size() == 1:
        return linked_list
    elif linked_list.head is None:
        return linked_list

    left_half, right_half = split(linked_list)
    left = merge_sort(left_half)
    right = merge_sort(right_half)

    return merge(left, right)

def split(linked_list):
    """
    Divide unsorted list at endpoint into sublists
    """

    if linked_list == None or linked_list.head == None:
        left_half = linked_list
        right_half = None

        return left_half, right_half
    else:
        size = linked_list.size()
        mid = size//2

        mid_node = linked_list.node_at_index(mid-1)

        left_half = linked_list
        right_half = SinglyLinkedList()
        right_half.head = mid_node.next_node
        mid_node.next_node = None

        return left_half, right_half

    def merge(left, right):
        """
        Merges two linked lists, sorting data in nodes
        Returns a new, merged list
        """

        # Create a ew linkedlist that cntais nodes from
        # merging left and right
        merged = SinglyLinkedList()

        # Add a fake head that is discarded later
        merged.add(0)

        # Set current to the head of the linked list
        current = merged.head

        # Obtain head nodes for left and right linked lists
        left_head = left.head
        right_head = right.head

        # Iterate over l & r until we reach tail node of each
        while left_head or right_head:
            # If the head nodeofl is None we're past the tail
            # dd the node from r to merged linked list
            if left_head is None:
                current.next_node = right_head
                # Call next on right to set loop condition to False
                right_head = right_head.next_node
            # Iff the head node of r is None we're past the tail
            # Add tail node from l to merged linked list
            elif right_head is None:
                current.next_node = left_head
                # Call next on l to set loop condition to False
                left_head =left_head.next_node
            else:
                # Not at either tail node
                # Obtain node data to perform comparison options
                left_data = left_head.data
                right_data = right_head.data
                # If data on l is less than r, set current to l node
                if left_data < right_data:
                    current.next_node = left_head
                    # Move left head to nextnode
                    left_head = left_head.next_node
                # If data on l is greater than r, set current to r node
                else:
                    current.next_node = right_head
                    # Move right head to next node
                    right_head = right_head.next_node
            # Move current to next node
            current = current.next_node

        # Discard fake head and set first merged node as head
        head = merged.head.next_node
        merged.head = head

        return merged