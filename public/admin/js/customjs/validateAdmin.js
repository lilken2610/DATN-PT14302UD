$(document).ready(function () {
    $("#formAddCategory").validate({
            rules: {
                namecat: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                namecat: {
                    required: "Xin vui lòng nhập tên!",
                    minlength: "Tên quá ngắn!"
                }
            }
        });
    });
    
    $(document).ready(function () {
        $("#formEditCategory").validate({
                rules: {
                    editnamecat: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    editnamecat: {
                        required: "Xin vui lòng nhập tên!",
                        minlength: "Tên quá ngắn!"
                    }
                }
            });
        });
   $(document).ready(function () {
            $("#formEditCategory").validate({
                    rules: {
                        editnamecat: {
                            required: true,
                            minlength: 5
                        }
                    },
                    messages: {
                        editnamecat: {
                            required: "Xin vui lòng nhập tên!",
                            minlength: "Tên quá ngắn!"
                        }
                    }
                });
            });

        $(document).ready(function () {
                $("#formAddnew").validate({
                        rules: {
                            namenew: {
                                required: true,
                                minlength: 5
                            },
                            pic: {
                                required: true,
                            },
                            previewnew: {
                                required: true,
                                minlength: 20
                            },
                            detailnew: {
                                required: true
                            },
                        },
                        messages: {
                            namenew: {
                                required: "Xin vui lòng nhập tiêu đề!",
                                minlength: "Tiêu đề quá ngắn!"
                            },
                            pic: {
                                required: "Vui lòng chọn hình ảnh!"
                            },
                            previewnew: {
                                required: "Xin vui lòng nhập mô tả!",
                                minlength: "Mô tả quá ngắn"
                            },
                            detailnew: {
                                required: "Xin vui lòng nhập nội dung bài viết!"
                            }
                        }
                    });
                });
                $(document).ready(function () {
                    $("#add-slide").validate({
                            rules: {
                                title: {
                                    required: true,
                                    minlength: 5
                                }
                            },
                            messages: {
                                editnamecat: {
                                    required: "Xin vui lòng nhập tiêu đề cho slide!",
                                    minlength: "Tiêu đề cho slide quá ngắn!"
                                }
                            }
                        });
                    });
                    $(document).ready(function () {
                        $("#add-user").validate({
                                rules: {
                                    username: {
                                        required: true,
                                        unique: posts,
                                        minlength: 5
                                    },
                                    fullname: {
                                        required: true,
                                        minlength: 10
                                    },
                                    email: {
                                        required: true,
                                        email: true,
                                    },
                                    phone: {
                                        required: true,
                                        
                                    }
                                },
                                messages: {
                                    editnamecat: {
                                        required: "Xin vui lòng nhập username!",
                                        unique: "Có người xài username đó rồi!",
                                        minlength: "Username quá ngắn!"
                                    }
                                }
                            });
                        });
