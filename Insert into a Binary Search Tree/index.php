<?php

// Definition for a binary tree node.
class TreeNode {
    public int $val;
    public TreeNode $left;
    public TreeNode $right;

    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {
    function insertIntoBST($root, $val) {
        if (is_null($root)) {
            return new TreeNode($val);
        }

        if ($root->val < $val) {
            $root->right = $this->insertIntoBST($root->right, $val);
        } else {
            $root->left = $this->insertIntoBST($root->left, $val);
        }

        return $root;
    }
}