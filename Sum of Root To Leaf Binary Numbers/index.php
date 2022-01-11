<?php


// Definition for a binary tree node.
class TreeNode {
    public int $val;
    public TreeNode $left;
    public TreeNode $right;
}

class Solution {

    private int $sum = 0;

    public function sumRootToLeaf(TreeNode $root): int {
        $this->manipulate($root);

        return $this->sum;
    }

    private function manipulate(?TreeNode $root, string $prev = ''): void
    {
        if (is_null($root)) {
            return;
        }

        $prev .= $root->val;
        if (is_null($root->right) && is_null($root->left)) {
            $this->sum += bindec($prev);
        }
        $this->manipulate($root->right, $prev);
        $this->manipulate($root->left, $prev);
    }
}
