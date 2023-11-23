<?php

function getSinhVienCuaLop($lop_id, $conn)
{
  $sql = "SELECT masinhvien FROM lop_rec
          WHERE id_lophoc=:idlop";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':idlop',$lop_id);
    
  $stmt->execute();
  if ($stmt->rowCount() >= 1) {
    $sinhvien = $stmt->fetchAll();
    return $sinhvien;
  } else {
    return 0;
  }
}

function getSoLuongSinhVienCuaLop($lop_id, $conn)
{
  $sql = "SELECT masinhvien FROM lop_rec
          WHERE id_lophoc=:idlop";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':idlop',$lop_id);
    
  $stmt->execute();
  if ($stmt->rowCount() >= 1) {
    return $stmt->rowCount();
  } else {
    return 0;
  }
}

function getGiangVienCuaLop($lop_id, $conn)
{
  $sql = "SELECT magiangvien FROM lophoc
          WHERE id=:idlop";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':idlop',$lop_id);
    
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $giangvien = $stmt->fetch();
    return $giangvien;
  } else {
    return 0;
  }
}

function getLopCuaSinhVien($sinhvien_id, $conn)
{
  $sql = "SELECT * FROM lop_rec
          WHERE masinhvien=?";
  $stmt = $conn->prepare($sql);    
  $stmt->execute([$sinhvien_id]);

  if ($stmt->rowCount() >= 1) {
    $lophoc = $stmt->fetchAll();
    return $lophoc;
  } else {
    return 0;
  }
}

function getTenCuaKhoa($khoa_id, $conn) {
  $sql = "SELECT tenkhoahoc FROM khoahoc
          WHERE makhoahoc=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$khoa_id]);
  if ($stmt->rowCount() == 1) {
    $tenkhoa = $stmt->fetch();
    return $tenkhoa;
  } else {
    return 0;
  }
}

function svKiemTraQuyenVaoLop($id_sv, $id_lophoc, $conn) {
  $sql = "SELECT * from lop_rec
          WHERE id_lophoc=:lop AND masinhvien=:sv";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop',$id_lophoc);
  $stmt->bindParam(':sv',$id_sv);
  $stmt->execute();
  if ($stmt->rowCount()<1) {
    return false;
  } else {
    return true;
  }
}

function gvKiemTraQuyenVaoLop($magv, $id_lophoc, $conn) {
  $sql = "SELECT * from lophoc
          WHERE id=:lop AND magiangvien=:gv";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':lop',$id_lophoc);
  $stmt->bindParam(':gv',$magv);
  $stmt->execute();
  if ($stmt->rowCount()<1) {
    return false;
  } else {
    return true;
  }
}

function getLopTheoId($id, $conn) {
  $sql = "SELECT malophoc,makhoahoc FROM lophoc
          WHERE id=?";
  $stmt = $conn->prepare($sql);    
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $lophoc = $stmt->fetch();
    return $lophoc;
  } else {
    return 0;
  }
}

function getBaiGiangCuaLop($lop_id, $conn) {
  $sql = "SELECT id,tieude FROM baigiang
          WHERE id_lophoc=?";
  $stmt = $conn->prepare($sql);
    
  $stmt->execute([$lop_id]);
  if ($stmt->rowCount() >= 1) {
    $baigiang = $stmt->fetchAll();
    return $baigiang;
  } else {
    return 0;
  }
}

function getNoiDungBaiGiang($baigiang_id, $conn) {
  $sql = "SELECT * FROM baigiang
          WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$baigiang_id);
    
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}

function getBaiTapCuaLop($lop_id, $conn) {
  $sql = "SELECT id,tieude FROM baitap
          WHERE id_lophoc=?";
  $stmt = $conn->prepare($sql);
    
  $stmt->execute([$lop_id]);
  if ($stmt->rowCount() >= 1) {
    $baigiang = $stmt->fetchAll();
    return $baigiang;
  } else {
    return 0;
  }
}

function getBaiTapTheoId($baitap_id, $conn) {
  $sql = "SELECT * FROM baitap
          WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id',$baitap_id);
    
  $stmt->execute();
  if ($stmt->rowCount() == 1) {
    $baigiang = $stmt->fetch();
    return $baigiang;
  } else {
    return 0;
  }
}



