<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
			['title' => 'Về chúng tôi', 'image' => '["1about.jpg"]','summary' => 'Chúng tôi là tổ chức lớn nhất của tại Việt Nam dành riêng cho việc bảo vệ và thúc đẩy sức khỏe và phúc lợi của tất cả các con chó.','active' => 1, 'hot' => 1,'content' => '<p>Ch&uacute;ng t&ocirc;i cung cấp cho c&aacute;c chủ sở hữu ch&oacute; v&agrave; những người l&agrave;m việc với ch&oacute; một nguồn kinh nghiệm gi&aacute;o dục v&agrave; lời khuy&ecirc;n tuyệt vời về sức khỏe, đ&agrave;o tạo v&agrave; nh&acirc;n giống của ch&oacute;.</p>', 'slugs' => 've-chung-toi', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		]);
    }
}
