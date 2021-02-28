PROGRAM SGIScript(INPUT, OUTPUT);
USES
  DOS;
VAR
  Name, Query: STRING;
  I: INTEGER;
BEGIN {SGIScript}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Query := GetEnv('QUERY_STRING');

  IF (Length(Query) > 0)  //определить, есть ли что-то в QUERY_STRING
  THEN
    BEGIN
      FOR I := POS('=', Query) + 1 TO Length(Query)
      DO
        Name := Concat(Name, Query[I]);
      WRITELN('Hello dear,', Name)
    END
  ELSE
    WRITELN('Hello —ыч')
END. {SGIScript}


