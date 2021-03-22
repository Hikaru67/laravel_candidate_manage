<?php

use Illuminate\Database\Seeder;
use App\EmailTemplate;
use Faker\Factory;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data = [
            [
                'id' => 1,
                'name'  => 'Schedule interview email',
                'title' => '[DIGI DINOS] - THƯ MỜI TRAO ĐỔI - FRESHER PHP',
                'content' => "Cảm ơn sự quan tâm của Bạn đối với vị trí Fresher PHP tại công ty digidinos.
                            Như đã trao đổi với bạn qua điện thoại, DIGI DINOS muốn đồng hành cùng bạn trong thời gian thực tập tới
                            Theo đó, công ty muốn mời Bạn trao đổi tại Công Ty Cổ Phần Digi Dinos như sau:

                            1. Thời gian: Thu Mar 11 2021.
                            2. Địa điểm: Công Ty Cổ Phần Digi Dinos
                                               Phòng 708, tòa nhà C'office, Thành Thái, Cầu Giấy Hà Nội (đi qua công viên Cầu Giấy, cuối đường Thành Thái)

                            3. Người liên hệ: Ms Nhung – Phòng nhân sự
                                                     Điện thoại: 039 5805 893

                            Bạn vui lòng xác nhận tham dự hoặc muốn thay đổi thời gian trao đổi bằng cách phản hồi lại thư này.
                            Best Regard,",
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name'  => 'Thank email',
                'title' => '[DIGI DINOS] - THƯ CẢM ƠN',
                'content' => $faker->unique()->realText(),
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name'  => 'schedule work email',
                'title' => '[DIGI DINOS] - THƯ MỜI LÀM VIỆC',
                'content' => "Cám ơn Bạn đã ứng tuyển và trao đổi trực tiếp cùng Digi Dinos tại vị trí Thực Tập Sinh PHP

                            Căn cứ vào kết quả buổi phỏng vấn, công ty vui mừng thông báo tới Bạn Thư mời thực tập cho vị trí đã ứng tuyển.

                            Chi tiết như trong file đính kèm.

                            Xin vui lòng phản hồi cho chúng tôi trước Thu Mar 11 2021.

                            Chúng tôi hân hoan chào đón bạn gia nhập, làm việc tại công ty và tin tưởng sự hợp tác lâu dài.
                            Ps: tự túc máy tính thực tập",
                'created_at' => now(),
            ],
        ];

        EmailTemplate::insert($data);
    }
}
